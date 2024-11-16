export function initExternalScript() {
    // This; function will be called from your Vue component after the script is loaded.
  //alert("hello")
    // start: Sidebar
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
    // end: Sidebar
}
  