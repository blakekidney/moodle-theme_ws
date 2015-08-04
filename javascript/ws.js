/*
/////////////////////////////////////////////////////////////////////////////
WS - JAVASCRIPT
/////////////////////////////////////////////////////////////////////////////
*/
//jQuery(function($) {
require(['jquery'], function($) {	
	
	//if we are on the assignment module grading page, the add a full screen option
	if(document.getElementById('page-mod-assign-view')) ModAssignFullView();
		
	/*************************************************
	Creates a full screen button on the grader report 
	to make it easier to use.
	*************************************************/
	function ModAssignFullView() {
		
		//set the $ alias to jQuery
		jQuery(function($) {
			
			//variables
			var initialized = false, isopen = false;
			var btn, win, table, stickyHeader, from, to, offset, stickyoffset = false;
			
			table = $('#region-main').find('.gradingtable').find('.generaltable');			
			btn = $('<div class="btn-modassign-view-full"><a href="#">View Full Screen</a></div>')
				.insertBefore(table.parent())
				.children('a')
				.click(btnHandler);
				
			function btnHandler(event) {
				event.preventDefault();				
				if(!initialized) init();	
				if(isopen) closeView();
				else openView();
			}
			function init() {				
				initialized = true;
				if(!win) {
					win = $(window);					
					//create a sticky header
					stickyHeader = $('<table class="stickyheader '+table.attr('class')+'"><thead></thead></table>');
					stickyHeader.children('thead').append(table.find('tr').eq(0).clone());
					stickyHeader.css({
						'position': 'absolute',
						'top': '0',
						'left': '0', 
						'background-color':'white'
					});					
					stickyHeader.insertBefore(table);	
					//stick the leftScroller to the left of the window
					win.scroll(reposition);
				}
			}
			function openView() {
				isopen = true;
				btn.text('Exit Full Screen');
				//apply the new css class stiles to the page
				$('body').addClass('modassign-view-full');
				//stickyHeader
				offset = table.offset().top;
				stickyHeader.css('top', '0');
				if(!stickyoffset) stickyoffset = stickyHeader.offset().top - $('body').children().first().offset().top;
				stickyHeader.hide(); //hide after we get the offset
				//match column sizes
				stickyHeader.css('max-width', 'none');
				stickyHeader.width( table.width() );
				stickyHeader.find('th').each(function(i, th) {
					from = table.find('th').eq(i);
					to = $(th);					
					to.width(from.width());
					to.height(from.height());
				});	
				reposition();
			}
			function closeView() {
				isopen = false;
				btn.text('View Full Screen');
				$('body').removeClass('modassign-view-full');
				stickyHeader.hide();
			}	
			function reposition() {
				if(isopen && stickyHeader) {
					if(win.scrollTop() > offset && win.scrollTop() < offset + table.outerHeight()) {
						stickyHeader.show();
						stickyHeader.css('top', win.scrollTop() - stickyoffset);
					} else {
						stickyHeader.hide();
					}		
				}
			}
			
		});
	}
	
});