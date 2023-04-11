function showCanvas() {
	$("body").css({
		cursor: "wait"
	}), $("#canvasLoader").removeClass("hide")
}

function hideCanvas() {
	$("body").css({
		cursor: "default"
	}), setTimeout(function () {
		$("#canvasLoader").addClass("hide")
	}, 400)
}

function showMessage(e, t, a, n, r, s) {
	var i = jQuery.isPlainObject(s) ? 1 : 0;
	if ($("#canvasMessage").modal("toggle"), $("#canvasAlertIcon").html('<i class="la la-' + n + " text-" + t + '" style="font-size: 70px;"></i>'), $("#canvasMessage").find("div.modal-title").html('<span style="">' + a + "</span>"), $("#canvasAlertMessage").html("<p>" + e + "</p>"), $("#canvasMessage .modal-footer").find("button").not("#canvasCloseBtn").remove(), void 0 !== s || !jQuery.isEmptyObject(s)) {
		if ("" == s) return !1;
		$.each(s, function (e, t) {
			i || (e = t), "Delete" == e ? $('<a id="canvas' + e + 'Btn" href="" class="waves-effect waves-light btn m-btn--pill btn-outline-danger btn-sm m-btn m-btn--custom theme-button deleteBtn" style="" data-dismiss="modal" role="button">' + t + "</a>").insertAfter("#canvasCloseBtn") : "Revoke" == e ? $('<a id="canvas' + e + 'Btn" href="" class="waves-effect waves-light btn m-btn--pill btn-outline-danger btn-sm m-btn m-btn--custom theme-button revokeBtn" style="" data-dismiss="modal" role="button">' + t + "</a>").insertAfter("#canvasCloseBtn") : "Register" == e ? $('<a id="canvas' + e + 'Btn" href="" class="waves-effect waves-light btn m-btn--pill btn-outline-success btn-sm m-btn m-btn--custom theme-button theme-green-button" style="" data-dismiss="modal" role="button">' + t + "</a>").insertAfter("#canvasCloseBtn") : $('<a id="canvas' + e + 'Btn" href="" class="waves-effect waves-light btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button" style="color:#000;" data-dismiss="modal" role="button">' + t + "</a>").insertAfter("#canvasCloseBtn")
		})
	}
	$("#canvasMessage").on("hidden.bs.modal", function () {
		$("#canvasCloseBtn").text("Close"), $(".modal-backdrop").remove(), $("#canvasMessage .modal-footer").find("a").not("#canvasCloseBtn").remove(), r.constructor === Array ? $.redirect(r[0], r[1]) : "" != r && (window.location.href = r)
	})
}

function ajaxSend(e, t, a, n, r, s, i, o) {
	if (!window.ajaxEnabled) return !1;
	a = a || "POST", s = s || 0, r = r || 0;
	var c = "application/x-www-form-urlencoded; charset=UTF-8",
		l = !0;
	1 == o && (l = c = !1);
	var u = 0;
	(i = i || 0) || showCanvas(), r && console.log("url:" + e + " ## val:" + JSON.stringify(t, null, 4) + " ## method:" + a + " ## fCallback:" + n.name + " ## debug:" + r + " ## bypassBlocking:" + s + " ## ajaxBlocking:" + u), 0 !== u && !s || (u = 1, $.ajax({
		url: e,
		type: a,
		data: t,
		contentType: c,
		processData: l,
		success: function (e) {
			e || showMessage(translations.M01247[language], "danger", translations.M01169[language], "times-circle-o", "");
			var t = JSON.parse(e);
			r && console.log(t), 2 == r ? n(t) : "1" == t.code ? "function" == typeof n && n(t, t.message_d, t) : "-100" == t.errorCode ? $("#registerPop").modal("toggle") : errorHandler(t.code, t.message, t.message_d)
		},
		error: function (e) {
			r && console.log(e);
			e.status, e.statusText;
			showMessage(translations.M01168[language], "danger", translations.M01169[language], "times-circle-o", "")
		},
		complete: function () {
			u = 0, i || hideCanvas()
		}
	}))
}

function errorHandler(e, t, a) {
	switch (e) {
		case 0:
		case 1:
			showMessage(a, "warning", t, "warning", "");
			break;
		case 2:
			showMessage(a, "danger", t, "times-circle-o", "");
			break;
		case 3:
			showMessage(a, "danger", "Session Time Out", "user-times", "login.php");
			break;
		case 4:
			$(location).attr("href", "maintenance.php");
			break;
		case -100:
			$.ajax({
				type: "POST",
				url: "scripts/reqLogin.php",
				data: {
					command: "logout"
				},
				success: function (e) {},
				error: function (e) {
					alert("Error!")
				}
			}), showMessage(a, "danger", t, "times-circle-o", "login.php");
			break;
		case -101:
			$.ajax({
				type: "POST",
				url: "scripts/reqLogin.php",
				data: {
					command: "logout"
				},
				success: function (e) {},
				error: function (e) {
					alert("Error!")
				}
			}), showMessage(a, "danger", t, "times-circle-o", "login.php");
			break;
		default:
			alert("Unknown error code and message:" + e + " - " + t)
	}
}

function showErrorField(e) {
	var t = "text";
	e.type && (t = e.type), Array.isArray(e.field) ? $.each(e.field, function (e, t) {
		var a = "",
			n = [],
			r = [],
			s = [];
		if ($.each(t, function (e, t) {
				"id" == e && (a = t), "" != a && ("attr" == e && (Array.isArray(t) ? $.each(t, function (e, t) {
					n.push(t)
				}) : s.push(t)), "value" == e && (Array.isArray(t) ? $.each(t, function (e, t) {
					r.push(t)
				}) : s.push(t)), "msg" == e && (Array.isArray(t) ? $.each(t, function (e, t) {
					s.push(t)
				}) : s.push(t)))
			}), "" != a) {
			var i = $("#" + a);
			$.each(n, function (e, t) {
				r[e] ? i.attr(t, r[e]) : i.attr(t, ""), i.parsley().validate()
			}), $.each(s, function (e, t) {
				i.parsley().addError("custom", {
					message: t
				})
			})
		}
	}) : e.field && $("#" + e.field).attr("type", t).attr("required", "required").parsley().validate(), $(".content-page").find(".parsley-error").focus()
}

function showCustomErrorField(e) {
	Array.isArray(e) && $.each(e, function (e, t) {
		var a = "",
			n = "";
		$.each(t, function (e, t) {
			"id" == e ? a = t : "msg" == e && (n = t)
		}), "" != a && 0 < n.length && $("#" + a).text(n)
	})
}

function dateTimeFormat(e, t, a) {
	var n = "",
		r = "";
	return 0 !== a && (n = "DD/MM/YYYY"), 0 !== t && (r = "hh:mm:ss A"), moment.unix(e).format(n + " " + r)
}

function dateTime24Format(e, t, a) {
	var n = "",
		r = "";
	return 0 !== a && (n = "DD/MM/YYYY"), 0 !== t && (r = "HH:mm:ss"), moment.unix(e).format(n + " " + r)
}

function dateToTimestamp(e) {
	var t, a, n = e.split(" ");
	if (2 < n[0].split("/").length) t = n[0].split("/");
	else {
		if (!(2 < n[0].split("-").length)) return !1;
		t = n[0].split("-")
	}
	return a = t[1] + "/" + t[0] + "/" + t[2], 1 == n.length || (a = a + " " + n[1], n[2] && (a = a + " " + n[2])), Date.parse(a) / 1e3
}

function timestampToDate(e, t, a) {
	var n = new Date(1e3 * e),
		r = n.getDate() + "/" + (n.getMonth() + 1) + "/" + n.getFullYear();
	if (0 == t) return r;
	if (1 == t) var s = n.getHours() < 10 ? "0" + n.getHours() : n.getHours(),
		i = n.getMinutes() < 10 ? "0" + n.getMinutes() : n.getMinutes(),
		o = s + ":" + i;
	if (1 == a) return r = r + " " + o;
	var c = "";
	return 0 == a && (c = "AM", 0 == s && (s = 12), 12 < s && (c = "PM", s -= 12)), r = r + " " + (o = s + ":" + i + " " + c)
}

function getOffsetSecs() {
	return 60 * (new Date).getTimezoneOffset()
}

function getTodayDate() {
	var e, t = (e = new Date).getDate(),
		a = e.getMonth() + 1;
	return t < 10 && (t = "0" + t), a < 10 && (a = "0" + a), e = t + "/" + a + "/" + e.getFullYear()
}

function formatTime(e) {
	var t, a, n, r = 0,
		s = e.split(" ");
	if ((a = s[0].split(":")).length < 1) return !1;
	if ("pm" != (n = s[1]) && "PM" != n || (r = 12), (t = 12 == a[0] ? parseInt(a[0]) : parseInt(a[0]) + r) < 10 && (t = "0" + t), 12 != t || "am" != n && "AM" != n || (t = "00"), 2 == a.length) t = t + ":" + a[1];
	else {
		if (3 != a.length) return !1;
		t = t + ":" + a[1] + ":" + a[2]
	}
	return t
}

function buildSearchDataByType(e) {
	search = $("#" + e);
	var t, a, n, r, s, i, o, c, l, u, d = [];
	return search.find("div.form-group").each(function () {
		var e = $(this);
		if (s = "", e.find("input").length) s = "input";
		else {
			if (!e.find("select").length) return !0;
			s = "select"
		}
		if (l = c = o = i = "", u = 0, e.find(s).each(function () {
				var e = $(this);
				if (r = n = a = t = "", t = e.attr("dataName"), a = e.attr("dataType"), !t || !a) return !0;
				switch (n = "select" == s ? e.find("option:selected").val() : e.val(), u++, a) {
					case "dateRange":
						n = n ? dateToTimestamp(n) : 0, 1 == u ? i = n : 2 == u && (o = n), i == o && 0 < i && (o += 86399);
						break;
					case "singleDate":
						if (!n) return !0;
						n = dateToTimestamp(n);
						break;
					case "timeRange":
						if (!(r = e.attr("dataParent")) || !n) return !0;
						1 == u ? c = formatTime(n) : 2 == u && (l = formatTime(n)), n = dateToTimestamp(n = (n = $('input[dataName = "' + r + '"]').val()) || getTodayDate());
						break;
					case "select":
					case "text":
						break;
					default:
						return !0
				}
				return !n || void 0
			}), !t || !a) return !0;
		"dateRange" == a && (i || o) ? d.push({
			dataName: t,
			dataType: a,
			tsFrom: i,
			tsTo: o
		}) : "timeRange" == a && (c || l) ? d.push({
			dataName: t,
			dataType: a,
			dataValue: n,
			timeFrom: c,
			timeTo: l
		}) : n && d.push({
			dataName: t,
			dataType: a,
			dataValue: n
		})
	}), d
}

function addColumn(e, t, a, n) {
	var r = 0;
	$("#" + e + " tr").each(function () {
		var e = $("<input />", {
				type: "checkbox",
				id: "chk" + r
			}),
			t = $("<span>");
		a ? $(this).find("td").eq(a).html() == n ? t.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(this) : e.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(this) : e.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(this);
		r++
	}), $("#chk0").css("display", "none")
}

function limitInteger() {
	this.value = this.value.replace(/[^0-9]/g, "")
}

function limitFloat() {
	this.value = this.value.replace(/[^0-9.]/g, "")
}

function checkFloatNumber(e) {
	return e.match(/^-?\d*(\.\d+)?$/)
}

function out() {
	ajaxSend("scripts/reqLogin.php", {
		command: "logout"
	}, "POST", logoutCallBack, 1, 0, 0, 0)
}

function logoutCallBack(e, t) {
	window.location.href = "login.php"
}

function reloadPage(e, t) {
	window.location.href = "dashboard.php"
}

function isNumberKey(e) {
	var t = e.which ? e.which : event.keyCode;
	return !(31 < t && (t < 48 || 57 < t))
}
$.urlParam = function (e) {
	var t = new RegExp("[?&]" + e + "=([^&#]*)").exec(window.location.href);
	return null == t ? null : decodeURI(t[1]) || 0
}, $(function () {
	var a = /./;
	$("input[type=datepicker]").on("keydown keyup", function (e) {
		var t = String.fromCharCode(e.which) || e.key;
		if (a.test(t)) return e.preventDefault(), !1
	})
});
var timer = 0;

function updateCharCount(t, a, e) {
	0 == timer && delay(function () {
		timer = 0;
		var e = SmsCounter.count($("#" + t).val());
		$("#" + a).empty().append(e.length).digits()
	}, 200)
}
var delay = function (e, t) {
	clearTimeout(timer), timer = setTimeout(e, t)
};

function receipentChange() {
	if ("" == $("#receiptientID").val()) var e = "";
	else e = $("#receiptientID").val().split(",");
	"" == e[e.length - 1] && e.splice(e.length - 1, 1);
	$("#receiptientID").attr("contain");
	$("#receiptientID").attr("contain", e.length), $("#totalRecipient").text(e.length + " ")
}

function getUtcTime(e) {
	var t = getTodayDate() + " " + e,
		a = -getOffsetSecs();
	return dateTime24Format(dateToTimestamp(t) - a, 1, 1).split(" ")[1]
}

function getUserLocalTime(e) {
	var t = getTodayDate() + " " + e,
		a = getOffsetSecs();
	return dateTime24Format(dateToTimestamp(t) - a, 1, 1).split(" ")[1]
}

function formatNumber(e, t, a) {
	return e = (e = parseFloat(e)).toFixed(t), 1 == a && (e = e.toString().replace(/(\d)(?=(\d\d\d)+(?!\d)+(?=(.\d\d)))/g, "$1,")), e
}
$.fn.digits = function () {
	return this.each(function () {
		$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
	})
};

function sanitize(string) {
	const map = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#x27;',
		"/": '&#x2F;',
	};
	const reg = /[&<>"'/]/ig;

	return string.replace(reg, function (match) {
		return map[match];
	});

}
