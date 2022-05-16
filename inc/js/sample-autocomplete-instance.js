
// phpcs:ignoreFile


document.getElementById("show-search-selection").style.display = 'none';
document.getElementById('results-fields').style.display = 'none';

document.addEventListener(
	'DOMContentLoaded',
	function (event) {
		ac.attach(
			{
				target: document.getElementById('search-target'),
				data: pharmacy_picker_object.data_array,
			}
		);
	}
);

document.getElementById('show-search-selection').addEventListener(
	"click",
	function () {
		let selected = document.getElementById('pmid').value;
		document.getElementById("show-search-selection").innerHTML = selected;
		document.getElementById("powerbi-container-header").innerHTML = 'Get PowerBI report for PMID = ' + selected;
	}
);

function clearSearchInput() {
	const searchInput = document.getElementById('search-target');
	const searchResults = document.getElementById('results-fields');

	searchResults.style.display = 'none';
	searchInput.value = '';
	document.getElementById("powerbi-container-header").innerHTML = '';
	document.getElementById("show-search-selection").innerHTML = 'Get PMID';
	document.getElementById("show-search-selection").style.display = 'none';
}

document.getElementById('search-target').addEventListener('change', showPMID);
function showPMID() {
	document.getElementById("show-search-selection").style.display = 'block';
}

// document.getElementById('search-target').addEventListener('change', showPharmacyInfo);
function showPharmacyInfo() {
	var elements = document.getElementsByClassName('input-field');
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = 'green';
		elements[i].style.display = 'grid';
		if (document.getElementById('search-target').value === '') {
			document.getElementById('results-fields').style.display = 'none';
		} else {
			document.getElementById('results-fields').style.display = 'block';
		}
	}
}
