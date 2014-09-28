var qa = {};

qa.autoSelectSearch = function() {
	window.onload = function() {
		var keyword = document.getElementById('keyword');
		keyword.onclick = function() {
			this.select();
		};
	};
};

qa.autoSelectSearch();