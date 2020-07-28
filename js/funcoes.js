function goBack() {
    window.location.href = "http://localhost:8080/softexpert/index.php"
}

function decimal(event) {
    this.value = parseFloat(parseFloat(this.value).toFixed(2));
}