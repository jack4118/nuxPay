function buildSearchData(a){search=$("#"+a);var e,n=[],i=[];return search.find("div.form-group").each(function(){var a=$(this);if(""!=(e=a.find("label.control-label").attr("data-th"))){if(a.find("input").length)a.find("input").each(function(){var a=$(this).val();""!=a&&i.push(a)});else if(a.find("select").length){var t=a.find("option:selected").val();""!=t&&i.push(t)}0<i.length&&n.push({dataName:e,dataValue:i}),i=[]}}),n}