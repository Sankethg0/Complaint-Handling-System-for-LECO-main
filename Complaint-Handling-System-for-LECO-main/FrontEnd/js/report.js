function generatePDF(){
    const element= document.getElementById("aaabb");

    html2pdf()
    .from(element)
    .save();
}