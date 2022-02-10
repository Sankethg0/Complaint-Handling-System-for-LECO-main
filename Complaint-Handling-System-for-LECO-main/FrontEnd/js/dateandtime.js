function renderTime(){
    var today=new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()+"  "+today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    document.getElementById("currentTime").value = time;
}
renderTime();
    