class dashboard {

    constructor(data) {
        this.data = data;
        this.createGraph();
    }

    getData() {
        return new Promise((resolve) => {
            $.ajax({
                url: '/dashboard/getData',
                success: (response) => {
                    resolve(this.data = response);
                }
            })
        });
    }

    createGraph() {
        this.getData().then(() => {
            let cpm = document.getElementById('cpm').getContext('2d');
            let upm = document.getElementById('upm').getContext('2d');
            new Chart(cpm, {
                type: 'line',
                data: {
                    labels: this.data.cpm.map((data) => {
                        return data.months;
                    }),
                    datasets: [{
                        label: "Contacts per month",
                        backgroundColor: 'rgb(22, 168, 134)',
                        borderColor: 'rgb(22, 140, 42)',
                        data: this.data.cpm.map((data) => {
                            return data.total;
                        })
                    }]
                },
                options: {}
            });
            new Chart(upm, {
                type: 'line',
                data: {
                    labels: this.data.upm.map((data) => {
                        return data.months;
                    }),
                    datasets: [{
                        label: "Contacts per month",
                        backgroundColor: 'rgb(83, 0, 251)',
                        borderColor: 'rgb(22, 0, 134)',
                        data: this.data.upm.map((data) => {
                            return data.total;
                        })
                    }]
                },
                options: {}
            });
        });
    }
}

new dashboard();
