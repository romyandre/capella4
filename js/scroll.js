

function graphicsb_data0()
{


    /*---------------------------------------------
    Scroll Bar images
    ---------------------------------------------*/


	this.up_button = "images/scroll_up.gif";                                          //image path and name only
	this.up_button_roll = "images/scroll_up.gif";                                //image path and name only
	this.down_button = "images/scroll_down.gif";                                      //image path and name only
	this.down_button_roll = "images/scroll_down.gif";                            //image path and name only


	this.slider_tile_bg_style = "background-image:url(images/scroll_slider_bg.gif);"  //image defined as CSS style


	this.bubble_top_cap = "images/scroll_topcap.gif,5";                        //image path and name, height - (width is automatically set to scroll bar width)
	this.bubble_bottom_cap = "images/scroll_bottomcap.gif,5";                  //image path and name, height - ""
	this.bubble_center = "images/scroll_center.gif,5";                         //image path and name, height - ""
	this.bubble_tile_bg_style = "images/scroll_bubble_bg.gif";                        //image path and name only





    /*---------------------------------------------
    Scroll Bar Container and Content
    ---------------------------------------------*/


	this.container_width = 700
	this.container_height = 250

	this.container_bg_color = "";



	this.content_padding = 0
	this.content_styles = "font-family:Verdana;font-weight:normal;font-size:11px;";
	this.content_class_name = "";




    /*---------------------------------------------
    Scroll Bar Behaviour and Width
    ---------------------------------------------*/


	this.scroll_bar_width = 17                     //The width of the bar in pixels.
	this.scroll_increment = 10                     //The distance to scroll when clicking the up or down buttons.


	this.allow_hover_scroll = true;                //Auto scroll while hovering over top and bottom buttons.
	this.hover_scroll_delay = 50;                  //Milliseconds (1/1000 second)


	this.use_hand_cursor = false;




}// JavaScript Document