function calculateDate(){
    let inputDate = new Date(document.getElementById("idate").value)
    /*Input Date*/
    var iday = inputDate.getDate()
    var imonth = inputDate.getMonth() + 1
    var iyear = inputDate.getFullYear()

    /*Output Date*/
    var oday = iday
    var omonth = imonth + 4
    var oyear = iyear

    /* add a year  */
    if(imonth + 4 > 12){
        oyear = oyear + 1
        omonth = omonth - 12
    }
    /* check if the month has 28 day */
    if (omonth == 2 && oday > 28){
        oday = oday - 28
        omonth = omonth + 1
        /* check if the month has 30 day */
    }else if ((omonth == 4 || omonth == 6 || omonth == 9 || omonth == 11)&& oday > 30){
        oday = oday - 30
        omonth = omonth +1
    }
    document.getElementById("odate").innerHTML = "Your next donation on : "+omonth+"/"+oday+"/"+oyear
}