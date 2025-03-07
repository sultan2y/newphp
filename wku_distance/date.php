<html>
<head>
<style type="text/css">
table {
    border: 2px solid yellow;
    background-color: white;
    width: 250px;
    height: 200px;
}
td {
    text-align: center;
    width: 35px;
}
.today {
    background-color: #FFD700; /* Gold for current day */
}
</style>
<script language="JavaScript">
var monthnames = new Array(
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
);
var linkcount = 0;

function addlink(month, day, href) {
    var entry = new Array(3);
    entry[0] = month;
    entry[1] = day;
    entry[2] = href;
    this[linkcount++] = entry;
}
Array.prototype.addlink = addlink;

var linkdays = new Array();
var monthdays = new Array(12);
monthdays[0] = 31;  // January
monthdays[1] = 28;  // February (updated for leap years below)
monthdays[2] = 31;  // March
monthdays[3] = 30;  // April
monthdays[4] = 31;  // May
monthdays[5] = 30;  // June
monthdays[6] = 31;  // July
monthdays[7] = 31;  // August
monthdays[8] = 30;  // September
monthdays[9] = 31;  // October
monthdays[10] = 30; // November
monthdays[11] = 31; // December

todayDate = new Date();
thisday = todayDate.getDay();
thismonth = todayDate.getMonth();
thisdate = todayDate.getDate();
thisyear = todayDate.getFullYear(); // Updated to use getFullYear() for modern JS

// Adjust February for leap years
if (((thisyear % 4 == 0) && !(thisyear % 100 == 0)) || (thisyear % 400 == 0)) {
    monthdays[1] = 29;
}

// Calculate starting day of the month
startspaces = thisdate;
while (startspaces > 7) {
    startspaces -= 7;
}
startspaces = thisday - ((thisdate - 1) % 7);
if (startspaces < 0) {
    startspaces += 7;
}

document.write("<table border='2' bgcolor='white' style='width:250px; height:200px;'>");
document.write("<tr><th colspan='7'>" + monthnames[thismonth] + " " + thisyear + "</th></tr>");
document.write("<tr>");
document.write("<td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td>");
document.write("</tr>");

for (s = 0; s < startspaces; s++) {
    document.write("<td>&nbsp;</td>");
}
count = 1;
while (count <= monthdays[thismonth]) {
    for (b = startspaces; b < 7; b++) {
        linktemp = "";
        for (c = 0; c < linkdays.length; c++) {
            if (linkdays[c] != null) {
                if ((linkdays[c][0] == thismonth + 1) && (linkdays[c][1] == count)) {
                    linktemp = "<a href='" + linkdays[c][2] + "'>" + count + "</a>";
                    break;
                }
            }
        }
        document.write("<td" + (count == thisdate ? " class='today'" : "") + ">");
        if (linktemp != "") {
            document.write(linktemp);
        } else if (count <= monthdays[thismonth]) {
            document.write(count);
        } else {
            document.write("&nbsp;");
        }
        document.write("</td>");
        count++;
        if (count > monthdays[thismonth]) break;
    }
    document.write("</tr><tr>");
    startspaces = 0;
}
document.write("</tr>");
document.write("</table>");
</script>
</head>
<body>
</body>
</html>