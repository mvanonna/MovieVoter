$("form#search").on('submit', function(e){
	e.preventDefault();

	var form = $(this);

	var query = form.find('input[name="search"]').val();
	if (query.length < 1) {
		return false;
	}

	Search.clearResults();
	Search.templateRenderUrl = form.data('template');

	$.ajax({
		url: form.attr('action'),
		type: 'POST',
		dataType: 'json',
		data: {'search': query},
	})
	.done(function(data) {
		
		switch ($.type(data)) {

			case "array":
				Search.listResults(data);
				break;
			case "object":
				Search.listResultItem(data);
				break;
			default:
				console.log($.type(data));
				//Not sure why there is a default...
				break;
		}
	})
	.fail(function() {
		Search.noResults();
		console.log("error");
	})
	.always(function() {
		// Do we even need this? Probably not...
	});
});

var Search = {

	clearResults: function(){
		$('.results').html('');
	},

	clearSearch: function(){
		$('input[name="search"]').val('');
	},

	noResults: function(){
		$('.results').html('No results');
	},

	listResults: function(results)
	{
		$.each(results, function (i, el) {
			Search.listResultItem(el);
		});
	},

	listResultItem: function(item)
	{
		Search.requestTemplate(item);
	},

	requestTemplate: function(item)
	{
		$.ajax({
			url: Search.templateRenderUrl,
			type: 'POST',
			data: item,
		})
		.done(function(data) {
			$('.results').append(data);
		})
		.fail(function() {
			console.log("error");
		});
	}

}