$(document).ready(function() {
    var currentTab="";
        // Click event handler for the arrow icons
        $('.sub-btn').click(function(event) {
            // Find the corresponding sub-menu
            const subMenu = $(this).next('.ulclass');     
            const carebtn = $(this).find('.carebtn');
            const isOpen = subMenu.is(':visible');        
            // Close the previously opened tab if it's not the same as the current tab
            if (currentTab && currentTab !== subMenu && !isOpen) {
                currentTab.slideUp();           
            }
            // Toggle the current tab and update the currentTab variable
            subMenu.slideToggle();
            currentTab = isOpen ? null : subMenu;       
        });
 
    $('.sidebar-menu-item.has-dropdown a.pages-link.sub-btn, .sidebar-dropdown-menu-item.has-dropdown > a').click(function(e) {
      $(".sidebar-menu-item.has-dropdown").removeClass("focused");
      $(this).parent("li.sidebar-menu-item.has-dropdown").toggleClass('focused');
      
    });

    $('.sidebar-toggle').click(function() {
        $('.sidebar').toggleClass('collapsed')
        $('.sidebar.collapsed').mouseleave(function() {
            $('.sidebar-dropdown-menu').slideUp('fast')
            $('.sidebar-menu-item.has-dropdown, .sidebar-dropdown-menu-item.has-dropdown').removeClass('focused')
        })
    })

    $('.sidebar-overlay').click(function() {
        $('.sidebar').addClass('collapsed')
        $('.sidebar-dropdown-menu').slideUp('fast')
        $('.sidebar-menu-item.has-dropdown, .sidebar-dropdown-menu-item.has-dropdown').removeClass('focused')
    })

    if(window.innerWidth < 768) {
        $('.sidebar').addClass('collapsed')
    }
    // end: Sidebar


    //Function to active class for selected left menu
    const navLinks = document.querySelectorAll(".navList");
    navLinks.forEach(function (element){
    element.addEventListener('click',function (){
    navLinks.forEach((e)=>{
        e.classList.remove('active');
        this.classList.add('active');
        })
      })
    })

    // Adding functionality of plus icon
    var ids =1
      $(document).on('click', '.add_fields',function (e) {
        e.preventDefault();
        var elmId = $(this).parent().parent().attr("id");
        //alert(elmId);
        ids++;
         
        var html=`<div class="p-2 ghyt appendChild gap-1" id="` + "form" + ids + `">
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">Hospital Name</label>
                        <input type="text" class="form-control username" name="items[`+ ids +`][hospital_name]" required >
                    </div>                 
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control useremail" name="items[`+ ids +`][hospital_email]" required>
                    </div> 
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control userphone" name="items[`+ ids +`][hospital_phone]" required maxlength="10">
                    </div>
                    <div class="col-md-3 mx-1">
                        <label for="" class="form-label">Role</label>
                        <input type="text" class="form-control usercountry" name="items[1][role]" value="Hospital" required readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control useradress" name="items[`+ ids +`][hospital_address]" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control userpassword" name="items[`+ ids +`][hospital_password]" required>
                    </div>                                                                 
                    <div class=" " id="`+ "firstparent" + ids + `" style=" position: absolute; display: flex; flex-direction: column; gap: 3rem; right: 15px;" >
                        <a href="#" class="add_fields" id="`+ "addfield" + ids + `"><i class="bi bi-plus-circle-fill"></i></a> 
                        <a href="#" class="remove_field"><i class="bi bi-dash-circle-fill"></i></a>
                    </div>
                </div>`;
        $(html).insertAfter('#' + elmId);
      });
 
  //  remove the child 
      $(document).on('click', '.remove_field', function (e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
      });

      // Ajax calling when form has been submitted
      $('#addforum').submit(function(e){      
        e.preventDefault();  
           $.ajax({                 
                url: '/submit',
                method: 'post',  
                data:$(this).serialize(),  
                success: function(response)  
                {                
                    if (response.status === 200) {
                      Swal.fire({
                      showConfirmButton:false,  
                      text: response.message,
                      icon: 'success',
                      timer:3000,
                        });                
                    }                
                    else {
                      Swal.fire({
                        icon: 'error',
                        text: response.message,
                          });
                    }
                    $("#addforum")[0].reset();
                    $('.appendChild').remove();
                      console.log(response);   
                }  
           });  
      });
 });


// Function to toggle dark mode
    function toggleDarkMode() {
        const sidebar = document.querySelector('.sidecolor');
        const header = document.querySelector('nav');
        const main = document.querySelector('main');
        sidebar.classList.toggle('bg-white');
        sidebar.classList.toggle('afterclass');

        header.classList.toggle('bg-white');
        header.classList.toggle('afterclass');

        main.classList.toggle('bg-light');
        main.classList.toggle('bg-dark');

        const elements = document.querySelectorAll('.sidebar-menu-item a');
        elements.forEach(element => {
            const currentColor = window.getComputedStyle(element).color;
            const isWhite = currentColor === 'rgb(255, 255, 255)';
            element.style.color = isWhite ? 'black' : 'white';
        });

        const elementss = document.querySelectorAll('.alltextcolor');
        elementss.forEach(element => {
            const currentColors = window.getComputedStyle(element).color;
            const isWhites = currentColors === 'rgb(255, 255, 255)';
            element.style.color = isWhites ? 'black' : 'white';
        });
    }

// Event listener to toggle dark mode on moon icon click
document.querySelector('#moon-icon').addEventListener('click', toggleDarkMode);








