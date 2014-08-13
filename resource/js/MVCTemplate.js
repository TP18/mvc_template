MVCTemplate = {

	/**
	 *
	 */
	init: function () {

	},

	/**
	 * @param {String}				url
	 * @param {Object|String|Array}	data
	 * @param {Function} 			successCallback
	 */
	ajax: function (url, data, successCallback) {
		jQuery.ajax({
			type: 'POST',
			url: url,
			data: data,
			success: successCallback
		});
	}
};

jQuery(document).ready(MVCTemplate.init.bind(MVCTemplate));
