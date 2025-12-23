function calculateCoastFire() {
    let age = +cf_age.value;
    let retire = +cf_retire_age.value;
    let invest = +cf_investment.value;
    let monthly = +cf_monthly.value;
    let rate = +cf_return.value / 100;
    let goal = +cf_goal.value;

    let years = retire - age;
    let months = years * 12;
    let mRate = rate / 12;

    let fvCurrent = invest * Math.pow(1 + rate, years);
    let fvMonthly = monthly * ((Math.pow(1 + mRate, months) - 1) / mRate);

    let totalFuture = fvCurrent + fvMonthly;
    let result = document.getElementById("cf_result");

    if (totalFuture >= goal) {
        result.innerHTML = `<div class="success">🎉 Coast FIRE Achieved<br>Future Value: ₹${totalFuture.toFixed(0)}</div>`;
    } else {
        let short = goal - totalFuture;
        let reqMonthly = short / ((Math.pow(1 + mRate, months) - 1) / mRate);
        result.innerHTML = `<div class="error">❌ Not Yet Coast FIRE<br>
        Shortfall: ₹${short.toFixed(0)}<br>
        Required Monthly SIP: ₹${reqMonthly.toFixed(0)}</div>`;
    }
}
