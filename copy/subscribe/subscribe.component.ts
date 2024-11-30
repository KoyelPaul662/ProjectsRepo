import { Component } from '@angular/core';
import { Subscribe } from './subscribe.model';
import { ActivatedRoute, Router } from '@angular/router';
import { UserdataService } from 'src/app/services/userdata.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-subscribe',
  templateUrl: './subscribe.component.html',
  styleUrls: ['./subscribe.component.scss']
})
export class SubscribeComponent {
  id:any="";
  userobj = new Subscribe();
  data:any;
  userName:any=''
  userstatus: any;
  handler:any = '';

  constructor(
    private route:ActivatedRoute,
    private userdata: UserdataService,
    private routes: Router,
  ){}

 

  ngOnInit(){
    //console.log(this.route.snapshot.params['id']);
    this.id=this.route.snapshot.params['id'];
    this.getSubData();
    this.loadStripe();
  }

  getSubData(){
    this.userdata.getsubscriber(this.id).subscribe(res=>{
      console.log(res);
      this.data = res;
      this.userobj = this.data;
      // console.log(this.userobj);
    })
  }

  
  pay(amount: any) {    
 
    var handler = (<any>window).StripeCheckout.configure({
      key: 'pk_test_51NsJylSDWf8pw13YGPTsTUD4zQuMvCFsCgb8tJPlmXO6vZa9R0cWaUbKPG6n98RXqpxn2e6Izugl6gC0u8mim4D800Wv5rMpEu',
      locale: 'auto',
      token: function (token: any) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        console.log(token)
        alert('Token Created!!');
      }
    });
 
    handler.open({
      name: 'Demo Site',
      description: '2 widgets',
      amount: amount * 100
    });
 
  }
 
  loadStripe() {
     
    if(!window.document.getElementById('stripe-script')) {
      var s = window.document.createElement("script");
      s.id = "stripe-script";
      s.type = "text/javascript";
      s.src = "https://checkout.stripe.com/checkout.js";
      s.onload = () => {
        this.handler = (<any>window).StripeCheckout.configure({
          key: 'pk_test_51HxRkiCumzEESdU2Z1FzfCVAJyiVHyHifo0GeCMAyzHPFme6v6ahYeYbQPpD9BvXbAacO2yFQ8ETlKjo4pkHSHSh00qKzqUVK9',
          locale: 'auto',
          token: function (token: any) {
            // You can access the token ID with `token.id`.
            // Get the token ID to your server-side code for use.
            console.log(token)
            alert('Payment Success!!');
          }
        });
      }
       
      window.document.body.appendChild(s);
    }
  }

  Subscribe(){
    Swal.fire({
      title: 'Are you sure?',
      text: 'You want to subscribe',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, subscribe it!'
    }).then((result) => {
        if (result.isConfirmed) {
            this.userdata.subscribeUser(this.userobj).subscribe( (response: any) =>{
            //console.log(this.userobj);
            Swal.fire({
              showConfirmButton:false,  
              text: response.message,
              icon: 'success',
              timer:3000,
            });
            this.userobj.amount='';
            this.userstatus=localStorage.setItem('userstatus', String(response.userstatus));
            this.userdata.userstatus.next(String(response.userstatus))
        })
      }
    })
  }
}
