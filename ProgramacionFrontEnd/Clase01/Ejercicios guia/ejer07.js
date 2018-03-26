function NumerosPrimos() {
    var contadorPrimos = 0;
    for (var i = 2; contadorPrimos <= 20; i++) {
        for (var k = 2; k < i / 2; k++) {
            if (i % k == 0) {
                break;
            }
        }
        if (i % k != 0 || i == 2) {
            contadorPrimos++;
            console.log(i + "\n");
        }
    }
}
NumerosPrimos();
