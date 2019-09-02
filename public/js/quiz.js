/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

window.onload = function () {

	var quizForm = document.getElementById("quizForm");
	var name = document.getElementById("name");
	var correctAlert = document.getElementById("correctAlert");
	var incorrectAlert = document.getElementById("incorrectAlert");
	var incorrectAlertAnswer = document.getElementsByClassName("answer-outcome-bottom-english");
	var incorrectAlertAnswerFirst = incorrectAlertAnswer[0];
	var letterá = document.getElementById("letterá");
	var letteré = document.getElementById("letteré");
	var letterí = document.getElementById("letterí");
	var letteró = document.getElementById("letteró");
	var letterú = document.getElementById("letterú");
	var letterü = document.getElementById("letterü");
	var letterñ = document.getElementById("letterñ");

	quizForm.addEventListener("submit", function (event) {
		event.preventDefault();

		// get the right anwer 
		var conjugationName = document.forms["quizForm"]["conjugationName"].value;
		// get the answer from the player
		var answer = document.forms["quizForm"]["answer"].value;

		if (answer.trim().toLowerCase() === conjugationName.toLowerCase()) {

			correctAlert.style.opacity = 1;
			incorrectAlert.style.display = 'none';
			// alert("correct answer");
			// return false;
		} else {

			incorrectAlert.style.opacity = 1;
			correctAlert.style.display = 'none';
			incorrectAlertAnswerFirst.innerHTML = conjugationName;
			// alert("wrong");
			// return true;
		}
	});

	var continueButton = document.getElementsByClassName("answer-outcome-bottom-continue_a");
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	for (var i = 0; i < continueButton.length; i++) {
		continueButton[i].addEventListener('click', function (event) {

			event.preventDefault();
			// var data = $('quizForm').serialize();
			// $.post('/valuateAnswer', data);
			var _token = $("input[name=_token]").val();
			var tenses = $("input[name='tenses\\[\\]']").map(function () {
				return $(this).val();
			}).get();

			var conjugationId = $("input[name=conjugationId]").val();
			var conjugationName = $("input[name=conjugationName]").val();
			var answer = $("input[name=answer]").val();

			$.ajax({
				url: '/valuateAnswer',

				type: 'POST',
				data: { token: _token, tenses: tenses, conjugationId: conjugationId, conjugationName: conjugationName, answer: answer },

				success: function success(data) {
					location.href = window.location.href;
				},
				error: function error(errorThrown) {
					console.log(errorThrown);
				}
			});
		}, false);
	}

	letterá.onclick = function () {
		name.value += 'á';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
	letteré.onclick = function () {
		name.value += 'é';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
	letterí.onclick = function () {
		name.value += 'í';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
	letteró.onclick = function () {
		name.value += 'ó';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
	letterú.onclick = function () {
		name.value += 'ú';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
	letterü.onclick = function () {
		name.value += 'ü';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
	letterñ.onclick = function () {
		name.value += 'ñ';
		var index = name.value.length;
		name.focus();
		name.setSelectionRange(index, index);
	};
};

/***/ })

/******/ });