let getNowDate = () => {
    //分别获取年、月、日、时、分、秒
    let myDate = new Date();
    let year = myDate.getFullYear();
    let month = myDate.getMonth() + 1;
    let date = myDate.getDate();
    let hours = myDate.getHours();
    let minutes = myDate.getMinutes();
    let seconds = myDate.getSeconds();

    //月份的显示为两位数字如09月
    if (month < 10) {
        month = "0" + month;
    }
    if (date < 10) {
        date = "0" + date;
    }
    if (hours < 10) {
        hours = "0" + hours;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (seconds < 10) {
        seconds = "0" + seconds;
    }

    //时间拼接
    let dateTime = "NowDate：" + year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;

    document.getElementById('nowdate').innerHTML = dateTime;
    setTimeout(getNowDate, 1000);
}


let countDay = (endtimeStr) => {
    //获取当前时间  
    let nowDate = new Date();
    let now = nowDate.getTime();
    //设置截止时间  
    let endDate = new Date(endtimeStr);
    let end = endDate.getTime();

    //时间差  
    let leftTime = end - now;
    console.log("leftTime", leftTime);

    let d, h, m, s;
    if (leftTime >= 0) {
        d = Math.floor(leftTime / 1000 / 60 / 60 / 24);
        h = Math.floor((leftTime - d * 1000 * 60 * 60 * 24) / 1000 / 60 / 60 % 24);
        m = Math.floor((leftTime - d * 1000 * 60 * 60 * 24) / 1000 / 60 % 60);
        s = Math.floor((leftTime - d * 1000 * 60 * 60 * 24) / 1000 % 60);
    }

    document.getElementById("countday").innerHTML = "距离寒假还有：" + d + "天" + h + "小时" + m + "分" + s + "秒";
}

let endtimeStr = "2020/1/15 00:00:00";
getNowDate();
countDay(endtimeStr);