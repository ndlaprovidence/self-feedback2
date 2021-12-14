  $("#downloadPdf").click(function (event) {
    // get size of report page
    var reportPageHeight = $("#reportPage").innerHeight();
    var reportPageWidth = $("#reportPage").innerWidth();
  
    // create a new canvas object that we will populate with all other canvas objects
    var pdfCanvas = $("<canvas />").attr({
      id: "canvaspdf",
      width: reportPageWidth,
      height: reportPageHeight
    });
  
    // keep track canvas position
    var pdfctx = $(pdfCanvas)[0].getContext("2d");
    var pdfctxX = 0;
    var pdfctxY = 0;
    var buffer = 100;
  
    // for each chart.js chart
    $("canvas").each(function (index) {
      // get the chart height/width
      var canvasHeight = $(this).innerHeight();
      var canvasWidth = $(this).innerWidth();
  
      // draw the chart into the new canvas
      pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
      pdfctxX += canvasWidth + buffer;
  
      // our report page is in a grid pattern so replicate that in the new canvas
      if (index % 2 === 1) {
        pdfctxX = 0;
        pdfctxY += canvasHeight + buffer;
      }
    });
  
    // create new pdf and add our new canvas as an image
    var pdf = new jsPDF("l", "pt", [reportPageWidth, reportPageHeight]);
    pdf.addImage($(pdfCanvas)[0], "PNG", 0, 0);
  
    // download the pdf
    pdf.save("filename.pdf");
  });
  