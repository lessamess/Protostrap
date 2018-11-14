
    $(function(){
        // PUT YOUR JAVASCRIPT HERE BELOW

        $('.toggleMenu').click(function(){
            console.log("pip");
            $("#nav-menu-icon").toggleClass('open');
            $("#menu").toggleClass('open');
            $(this).toggleClass("highlightBg");
            $("#mobileNav").toggleClass('takeBack');
        });

        


        $("body").on("touchstart", ".showImages", function() {
            
            $(".img-responsive.zusatzbild"+$(this).data("imgid")).toggleClass("angezeigt");
        });


        $("#checkcc").keyup(function() {
            var icon = "credit-card";
            var nummer = $(this).val();
            if(nummer.length < 2){
                iconstring = '<i class="fa fa-'+ icon + '"></i>';
                $("#creditCardIcon").html(iconstring);
                return;
            }

            nummer = parseInt(nummer.substr(0, 2));
            switch(nummer) {
                case 51:
                case 52:
                case 53:
                case 54:
                case 55:
                    icon = "cc-mastercard";
                    break;
                case 40:
                case 41:
                case 42:
                case 43:
                case 44:
                case 45:
                case 46:
                case 47:
                case 48:
                case 49:
                    icon = "cc-visa";
                    break;
                default:
                    icon = "credit-card";
            }

            iconstring = '<i class="fa fa-'+ icon + '"></i>';
            $("#creditCardIcon").html(iconstring);

        });
        
        $("body").on("click", ".changeQuantity", function() {

            var id = $(this).data("offerid");
            var quantity = parseInt($(this).siblings(".quantity").first().html())+parseInt($(this).data("amount"));
            if(quantity >=0){
                $(this).siblings(".quantity").first().html(quantity);
            }
            //console.log(id);
            // $(this).data("amount");


            var totalTickets = 0;
            var totalPrice = 0; 
            $(".amount"+id).each(function (it, elem) {
                totalTickets = totalTickets + parseInt($(elem).find(".quantity").first().html());
                totalPrice = totalPrice + parseInt($(elem).find(".quantity").first().html()) * parseFloat($(elem).find(".quantity").first().data("price"));
            });
            $("#total"+id).find(".totalTickets").first().html(parseInt(totalTickets));
            if(totalTickets > 1){
                $("#total"+id).find(".plural").removeClass("hide");
                $("#buy"+id).find(".plural").removeClass("hide");
            } else {
                $("#total"+id).find(".plural").addClass("hide");
                $("#buy"+id).find(".plural").addClass("hide");
            }
            if(totalTickets > 0){
                $("#total"+id).children().removeClass("hide");
                $("#buy"+id).removeClass("disabled");
                $("#total"+id).find(".totalPrice").first().html(totalPrice.toFixed(2));
            } else {
                $("#total"+id).children().addClass("hide");
                $("#buy"+id).addClass("disabled");
            }
        });
                
    })