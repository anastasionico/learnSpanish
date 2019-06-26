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
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

window.onload = function () {

			var quizForm = document.getElementById("quizForm");
			var correctAlert = document.getElementById("correctAlert");
			var incorrectAlert = document.getElementById("incorrectAlert");
			var incorrectAlertAnswer = document.getElementsByClassName("answer-outcome-bottom-english");
			var incorrectAlertAnswerFirst = incorrectAlertAnswer[0];

			quizForm.addEventListener("submit", function (event) {
						event.preventDefault();

						// get the right anwer 
						var conjugationName = document.forms["quizForm"]["conjugationName"].value;
						// get the answer from the player
						var answer = document.forms["quizForm"]["answer"].value;

						if (answer.toLowerCase() === conjugationName.toLowerCase()) {

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

			$.ajaxSetup({
						headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
			});
			$(".answer-outcome-bottom-continue_a").click(function (e) {
						e.preventDefault();

						var answers = document.forms["quizForm"].getElementsByTagName("input");
						console.log(answers);

						$.ajax({
									type: 'POST',
									url: '/valuateAnswer',
									data: { data: answers },
									success: function success(data) {
												alert(data.success);
									}
						});
			});
};

// GET THE ANSWER INTO DIFFERENT VARIABLES 
// GET THEM INTO DATA IN AJAX AND SEND THEM TO THE /valuateAnswer AND GET THE ALGORITH TO WORK

/***/ })

/******/ });