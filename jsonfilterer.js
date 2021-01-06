{
    var json = (function () {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': url,
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();
    arr = JSON.parse(JSON.stringify(json).replace(/\s(?=\w+":)/g, ""));
    reporters = _.filter(arr, function(p){
        if (p.CourseCode.includes("CE") || p.CourseCode.includes("IT")) {
            if (p.PaperYear >= 2015)
                return 1;
        }
        return 0;
    });
    //Convert JSON Array to string.
    var json = JSON.stringify(reporters);



    //Convert JSON string to BLOB.
    json = [json];
    var blob1 = new Blob(json, { type: "text/plain;charset=utf-8" });

    //Check the Browser.
    var url2 = window.URL || window.webkitURL;
    link = url2.createObjectURL(blob1);
    var a = $("<a />");
    a.attr("download", "Customers.txt");
    a.attr("href", link);
    $("body").append(a);
    a[0].click();
    $("body").remove(a);


}
