jQuery(function() {
	jQuery(".my-color-picker").wpColorPicker();

	let custom_uploader;
	jQuery(".my-img-select").click(function(e) {
		e.preventDefault();
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}
		custom_uploader = wp.media({
			title: "Choose Image",
			library: {
				type: "image"
			},
			button: {
				text: "画像を選択"
			},
			multiple: false
		});
		custom_uploader.on("select", function() {
			var images = custom_uploader.state().get("selection");
			images.each(function(file) {
				jQuery(".my-img-url").val(file.toJSON().url);
				jQuery(".my-img-show")
					.children()
					.remove();
				jQuery(".my-img-show").append('<img src="' + file.toJSON().url + '">');
			});
		});
		custom_uploader.open();
	});

	jQuery(".my-img-clear").on("click", function() {
		jQuery(".my-img-url").val("");
		jQuery(".my-img-show").empty();
	});
});
