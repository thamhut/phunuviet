$(function() {
	
	/**
	 * Set sidebar toggle collapsed
	 */
	$(document).on('click', '.navbar-static-top .sidebar-toggle', function() {
		var collapsed = $('body').hasClass('sidebar-collapse') ? 1 : 0;
		$.post(baseUri + '/backend/index/setLeftbarCollapse', {collapsed:collapsed});
	});
	
	/**
	 * Submit grid form to another action
	 */
	$(document).on('click', '.btn-grid-submit', function() {
		var action = baseUri + $(this).attr('data-action'),
			grid = $(this).attr('data-grid'),
			method = $(this).attr('data-method'),
			$form = $(grid).find('.oe-grid-form'),
			formAction = $form.attr('action'),
			formMethod = $form.attr('method');
		
		$('.check-item').each(function(e) {
			// Check selected is not null here
		});		
		$form.attr('method', method ? method : 'GET');
		$form.attr('action', action);
		$form.submit();
		$form.attr('action', formAction);
		$form.attr('method', formMethod);
	});
	
	$('.sortable').sortable({
		connectWith: ['.sortable']
	});
	
	$('.btn-submit-sort').on('click', function() {
		var items = {};
		$('.sortable').each(function() {
			var $t = $(this);
			items[$t.attr('id')] = '';
			$t.children('li').each(function () {
				var id = $(this).attr('id');
				if(items[$t.attr('id')] == '') {
					items[$t.attr('id')] = id;
				}	else {
					items[$t.attr('id')] += ','+id;					
				}				
			}); 
		});
		var form = jQuery('<form>', {
	        'action': baseUri + $(this).attr('data-form-action'),
	        'method': 'post'
	    }).append(jQuery('<input>', {
	        'name': 'items',
	        'value': JSON.stringify(items),
	        'type': 'text'
	    })).submit();
	});
	
	$(document).on('click', '.switch-sate-ajax label', function(e) {
		var input = $(this).parent().find('input[type="checkbox"]')
			,name = input.attr('data-name')
			,id = input.attr('id')
			,state = input.is(':checked') ? 0 : 1 // update by revert value
			,action = input.attr('data-action');
		
		$.post(baseUri + action, {name:name, id:id, state:state});
		e.stopPropagation();
	});
	
});