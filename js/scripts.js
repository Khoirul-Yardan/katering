// Simpan jumlah pesanan
let chartCount = 0;

// Fungsi menampilkan pop-up SweetAlert
function orderPackage(packageId) {
    Swal.fire({
        title: 'Pesan Paket',
        text: "Pilih cara memesan",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Masukkan ke Chart',
        cancelButtonText: 'Bayar Langsung',
    }).then((result) => {
        if (result.isConfirmed) {
            addToChart(packageId);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            processPayment(packageId);
        }
    });
}

// Fungsi menambah ke chart
function addToChart(packageId) {
    chartCount++;
    document.getElementById('chartCount').innerText = chartCount;
    Swal.fire('Berhasil!', 'Paket berhasil ditambahkan ke chart.', 'success');
}

// Fungsi proses pembayaran
function processPayment(packageId) {
    Swal.fire({
        title: 'Pembayaran',
        text: "Pilih metode pembayaran",
        icon: 'info',
        input: 'radio',
        inputOptions: {
            dp: 'DP',
            full: 'Bayar Total'
        },
        inputValidator: (value) => {
            if (!value) {
                return 'Pilih salah satu metode pembayaran!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Berhasil!', `Pembayaran metode ${result.value.toUpperCase()} diproses.`, 'success');
        }
    });
}

// Fungsi melihat chart
function viewChart() {
    Swal.fire('Chart Anda', `Total item di chart: ${chartCount}`, 'info');
}

// Fungsi akses admin
function goToAdmin() {
    window.location.href = '../admin/index.php';
}

// Simpan daftar pesanan
let chartItems = [];

// Fungsi menambah ke chart
function addToChart(packageId) {
    // Dummy data untuk paket (gunakan data sebenarnya dari backend jika perlu)
    const packages = {
        1: { name: 'Ayam 10 Sayur 10', price: 50000 },
        2: { name: 'Vegetarian', price: 40000 },
        3: { name: 'Special Package', price: 60000 },
    };

    // Cari paket berdasarkan packageId
    const selectedPackage = packages[packageId];

    // Tambahkan ke chart
    chartItems.push({
        id: packageId,
        name: selectedPackage.name,
        price: selectedPackage.price,
        quantity: 1,
    });

    // Perbarui jumlah chart
    document.getElementById('chartCount').innerText = chartItems.length;

    // Notifikasi sukses
    Swal.fire('Berhasil!', 'Paket berhasil ditambahkan ke chart.', 'success');
}

// Fungsi melihat chart
function viewChart() {
    if (chartItems.length === 0) {
        Swal.fire('Chart Kosong', 'Belum ada item di chart.', 'info');
        return;
    }

    // Bangun isi chart dalam format HTML
    let chartHtml = '<ul style="list-style:none; padding: 0;">';
    let totalPrice = 0;

    chartItems.forEach((item, index) => {
        totalPrice += item.price * item.quantity;
        chartHtml += `
            <li style="margin-bottom: 10px;">
                <strong>${item.name}</strong><br>
                Harga: Rp${item.price.toLocaleString()}<br>
                <input type="number" min="1" value="${item.quantity}" style="width: 50px;" onchange="updateQuantity(${index}, this.value)"> x
                <button style="background-color: red; color: white; border: none; cursor: pointer;" onclick="removeFromChart(${index})">Hapus</button>
            </li>
        `;
    });

    chartHtml += `</ul><hr><strong>Total: Rp${totalPrice.toLocaleString()}</strong>`;

    // Tampilkan SweetAlert pop-up
    Swal.fire({
        title: 'Daftar Pesanan Anda',
        html: chartHtml,
        showCancelButton: true,
        confirmButtonText: 'Bayar',
        cancelButtonText: 'Tutup',
    }).then((result) => {
        if (result.isConfirmed) {
            processPayment();
        }
    });
}

// Fungsi mengubah jumlah item
function updateQuantity(index, quantity) {
    chartItems[index].quantity = parseInt(quantity);
    viewChart(); // Refresh pop-up Chart
}

// Fungsi menghapus item dari chart
function removeFromChart(index) {
    chartItems.splice(index, 1);
    document.getElementById('chartCount').innerText = chartItems.length; // Perbarui badge chart
    viewChart(); // Refresh pop-up Chart
}

// Fungsi proses pembayaran
function processPayment() {
    Swal.fire({
        title: 'Pembayaran',
        text: "Pilih metode pembayaran",
        icon: 'info',
        input: 'radio',
        inputOptions: {
            dp: 'DP',
            full: 'Bayar Total'
        },
        inputValidator: (value) => {
            if (!value) {
                return 'Pilih salah satu metode pembayaran!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            chartItems = []; // Kosongkan chart setelah pembayaran
            document.getElementById('chartCount').innerText = 0;
            Swal.fire('Berhasil!', `Pembayaran metode ${result.value.toUpperCase()} diproses.`, 'success');
        }
    });
}

