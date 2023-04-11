function buildTable(a, e, t, i, n, l, s) {
    var d = jQuery.isPlainObject(n) ? 1 : 0;
    if ($("#" + t).find("table#" + e).remove(), $("#" + t).prev().removeClass("alert m-alert--default").html("").hide(), a) {
        var r;
        $("#" + t).append('<table id="' + e + '" class="table table-striped m-table"></table>'), $("#" + t).find("table#" + e).append('<thead class="m-datatable__head"><tr class="m-datatable__row"></tr></thead>'), $("#" + t).find("table#" + e).append('<tbody class="m-datatable__body"></tbody>'), r = Object.keys(a), i.length < 2 && (i = [], r = Object.keys(a), $.each(r, function(a, t) {
            i.push(t.split("_").join(" "))
        })), $.each(i, function(a, t) {
            $("#" + e).find("thead tr").append('<th class="m-datatable__cell">' + t + "</th>")
        }), (0 < n.length || !jQuery.isEmptyObject(n)) && $("#" + e).find("thead tr").append('<th class="m-datatable__cell"></th>');
        var c = 0;
        actionBtnArray = [], $.each(n, function(a, t) {
            d || (a = t), "edit" == a ? actionBtnArray.push("Edit") : "contact" == a ? actionBtnArray.push("Contact") : "view" == a ? actionBtnArray.push("View") : "revoke" == a ? actionBtnArray.push("Revoke") : "delete" == a ? actionBtnArray.push("Delete") : "detail" == a ? actionBtnArray.push("Detail") : "copy" == a && actionBtnArray.push("Copy")
        });
        for (var p = 0; p < a.length;) {
            $("#" + e).find("tbody").append("<tr id=" + p + ' class="m-datatable__row"></tr>');
            for (var f = Object.keys(a[p]), o = 0; o < f.length; o++) $("#" + e).find("tr#" + p).append('<td class="m-datatable__cell">' + a[p][f[o]] + "</td>");
            $("#" + e).find("tr#" + p).attr("data-th", a[p][f[0]]), (0 < n.length || !jQuery.isEmptyObject(n)) && ($("#" + e).find("tr#" + p).append('<td class="m-datatable__cell"></td>'), $("#" + e).find("tr#" + p + " td").last().append('<span style="display: inline-flex;"></span>'), c = 0, $.each(n, function(a, t) {
                d || (a = t);
                var i = t.charAt(0).toUpperCase() + t.slice(1);
                $("#" + e).find("tr#" + p + " td span").append('<a id="' + a + p + '" title="' + i + '" class="btn btn btn m-btn--pill m-btn--air btn-sm m-btn m-btn--custom ml-2 theme-button ' + a + 'Btn" onclick="tableBtnClick(this.id)"  style="" role="button">' + actionBtnArray[c] + "</a>"), c++
            })), p++
        }
        if (s)
            for (var k = s.pageNumber * s.numRecord, h = k - s.numRecord + 1, b = 1; h <= k;) $("#" + e).find("tr:nth-child(" + b + ") td:first-child").html(h), h++, b++;
        $('[data-toggle="tooltip"]').tooltip()
    } else $("#" + t).prev().addClass("alert m-alert--default").html("<span>" + l + "</span>").show()
}

function paginateTable(a, t, i, e, n) {
    var l = 10,
        s = 4,
        d = 4,
        r = $("#" + a),
        c = $("#" + t);
    if (r.hasClass("search_res")) {
        c.find("li").remove();
        var p = r.find("tbody tr.search_res")
    } else p = r.find("tbody tr");
    var f = p.length,
        o = Math.ceil(f / n);
    o < l && (l = o), i && (c.append('<li class="link"><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first firstLink"><i class="la la-angle-double-left"></i></a></li>'), c.append('<li class="link"><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev prevLink"><i class="la la-angle-left"></i></a></li>'));
    for (var k = 0; k < o && 1 == e;) c.append('<li><a class="m-datatable__pager-link m-datatable__pager-link-number pageLink">' + (k + 1) + "</a></li>"), k++;

    function h(a) {
        c.find("li").not(".link").hide();
        var t = a - s,
            i = a + d;
        t < 0 && (t = 0, i = l), c.find("li").not(".link").slice(t, i + 1).show()
    }

    function b(a) {
        var t = a * n,
            i = t + n;
        p.css("display", "none").slice(t, i).show(), 1 <= a ? (c.find(".prevLink").show(), c.find(".firstLink").show()) : (c.find(".prevLink").hide(), c.find(".firstLink").hide()), a < o - 1 ? (c.find(".nextLink").show(), c.find(".lastLink").show()) : (c.find(".nextLink").hide(), c.find(".lastLink").hide()), h(a), c.children().removeClass("active"), c.children().eq(a + 1 + 1).addClass("active")
    }
    i && (c.append('<li class="link"><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next nextLink"><i class="la la-angle-right"></i></a></li>'), c.append('<li class="link"><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last lastLink"><i class="la la-angle-double-right"></i></a></li>')), c.find(".pageLink:first").addClass("active"), c.find(".prevLink").hide(), c.find(".firstLink").hide(), o <= 1 && (c.find(".nextLink").hide(), c.find(".lastLink").hide(), c.find(".pageLink").hide()), c.children().eq(2).addClass("active"), h(1), p.hide(), p.slice(0, n).show(), c.find(".pageLink").click(function() {
        return b($(this).html().valueOf() - 1), !1
    }), c.find(".prevLink").click(function() {
        return function() {
            var a = parseInt(c.find("li.active a").text()) - 1;
            b(a -= 1)
        }(), !1
    }), c.find(".nextLink").click(function() {
        return function() {
            var a = parseInt(c.find("li.active a").text()) - 1;
            b(a += 1)
        }(), !1
    }), c.find(".firstLink").click(function() {
        return b(0), !1
    }), c.find(".lastLink").click(function() {
        return b(o - 1), !1
    })
}

function searchTable(a, t, i, e, n, l) {
    var s, d, r;
    s = $("#" + t), d = s.val().toUpperCase(), (r = $("#" + a)).addClass("search_res"), r.find("tbody tr").each(function() {
        $(this).find("td").each(function() {
            var a = $(this);
            if (-1 < a.text().toUpperCase().indexOf(d)) return a.parent("tr").addClass("search_res"), !1;
            a.parent("tr").removeClass("search_res"), a.parent("tr").hide()
        })
    });
    var c = 0;
    r.removeClass("table-striped"), r.find("tr.search_res").each(function() {
        var a = $(this);
        c % 2 == 0 ? a.css("background-color", "#f4f8fb") : a.css("background-color", "#fff"), c++
    }), paginate_table(a, i, e, n, l)
}

function pagination(a, t, i, e, n) {
    var l = $("#" + a),
        s = t * n,
        d = s - n + 1,
        r = 10,
        c = 4,
        p = 4,
        f = l.next();
    if (f.html(""), l.find("li").remove(), i) {
        e < s && (s = e);
        var o = "Displaying %%from%% - %%to%% of %%total%% records.",
            k = [d, s, e];
        if ($.each(["%%from%%", "%%to%%", "%%total%%"], function(a, t) {
                o = o.replace(t, k[a], o)
            }), f.html('<span id="paginateText" class="m-datatable__pager-detail">' + o + "</span>"), i) {
            e < s && (s = e), i < r && (r = i), 1 < t && (l.append('<li class="link"><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first sublink firstLink"><i class="la la-angle-double-left"></i></a></li>'), l.append('<li class="link"><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev sublink prevLink"><i class="la la-angle-left"></i></a></li>'));
            for (var h = 0; h < i && 1 < i;) l.append('<li><a class="m-datatable__pager-link m-datatable__pager-link-number pageLink">' + (h + 1) + "</a></li>"), h++;
            t < i && (l.append('<li class="link"><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--first sublink nextLink"><i class="la la-angle-right"></i></a></li>'), l.append('<li class="link"><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--prev sublink lastLink"><i class="la la-angle-double-right"></i></a></li>'));
            var b = parseInt(t) - 1;
            l.find("li a").not(".sublink").eq(b).addClass("m-datatable__pager-link--active"), u(parseInt(t)), l.find(".pageLink").click(function() {
                _($(this).html().valueOf())
            }), l.find(".prevLink").click(function() {
                _(parseInt(l.find("li a.m-datatable__pager-link--active").text()) - 1)
            }), l.find(".nextLink").click(function() {
                _(parseInt(l.find("li a.m-datatable__pager-link--active").text()) + 1)
            }), l.find(".firstLink").click(function() {
                _(1)
            }), l.find(".lastLink").click(function() {
                _(i)
            })
        }
    }

    function u(a) {
        l.find("li").not(".link").hide();
        var t = (a -= 1) - c,
            i = a + p;
        t < 0 && (t = 0, i = r), l.find("li").not(".link").slice(t, i + 1).show()
    }

    function _(a) {
        u(a), l.children().removeClass("active"), l.children().eq(a + 1).addClass("active"), pagingCallBack(a)
    }
}

function addCheckBox(a, t) {
    var i = 0;
    $("#" + a + " tr").each(function() {
        var a = $("<input />", {
            type: "checkbox",
            id: "chk" + i
        });
        $("<span>");
        a.wrap('<td style="width : 12px !important; font-size: 20px;"></td>').parent().prependTo(this), i++
    }), $("#chk0").change(function() {
        1 == $(this).is(":checked") ? $("#" + a).find('tbody input[type="checkbox"]').prop("checked", !0) : $("#" + a).find('tbody input[type="checkbox"]').prop("checked", !1)
    })
}

function addCustomClass(i, a, e) {
    $.each(a, function(a, t) {
        $("#" + i).find("tr th:nth-child(" + t + ")").addClass(e), $("#" + i).find("tr td:nth-child(" + t + ")").addClass(e)
    })
}

function paginationHP(a, t, i, e, n) {
    var l = $("#" + a),
        s = t * n,
        d = s - n + 1,
        r = 10,
        c = 4,
        p = 4,
        f = l.next();
    if (f.html(""), l.find("li").remove(), i) {
        e < s && (s = e);
        var o = "Displaying %%from%% - %%to%% of %%total%% records.",
            k = [d, s, e];
        if ($.each(["%%from%%", "%%to%%", "%%total%%"], function(a, t) {
                o = o.replace(t, k[a], o)
            }), f.html('<span id="paginateText" class="m-datatable__pager-detail">' + o + "</span>"), i) {
            e < s && (s = e), i < r && (r = i), 1 < t && l.append('<li class="link"><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev sublink prevLink">PREV</a></li>');
            for (var h = 0; h < i && 1 < i;) l.append('<li><a class="m-datatable__pager-link m-datatable__pager-link-number pageLink">0' + (h + 1) + "</a></li>"), h++;
            t < i && l.append('<li class="link"><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--first sublink nextLink">NEXT</a></li>');
            var b = parseInt(t) - 1;
            l.find("li a").not(".sublink").eq(b).addClass("m-datatable__pager-link--active"), u(parseInt(t)), l.find(".pageLink").click(function() {
                _($(this).html().valueOf())
            }), l.find(".prevLink").click(function() {
                _(parseInt(l.find("li a.m-datatable__pager-link--active").text()) - 1)
            }), l.find(".nextLink").click(function() {
                _(parseInt(l.find("li a.m-datatable__pager-link--active").text()) + 1)
            }), l.find(".firstLink").click(function() {
                _(1)
            }), l.find(".lastLink").click(function() {
                _(i)
            })
        }
    }

    function u(a) {
        l.find("li").not(".link").hide();
        var t = (a -= 1) - c,
            i = a + p;
        t < 0 && (t = 0, i = r), l.find("li").not(".link").slice(t, i + 1).show()
    }

    function _(a) {
        u(a), l.children().removeClass("active"), l.children().eq(a + 1).addClass("active"), pagingCallBack(a)
    }
}