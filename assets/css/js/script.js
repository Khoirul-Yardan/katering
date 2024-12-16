let cartCount = 0;

function buyNow(paketId) {
    Swal.fire({
        title: 'Form Pembelian',
        html: `
            <input type="text" id="nama" class="swal2-input" placeholder="Nama Penerima">
            <input type="text" id="alamat" class="swal2-input" placeholder="Alamat">
            <input type="text" id="penerima" class="swal2-input" placeholder="Nama Penerima">
        `,
        focusConfirm: false,
        preConfirm: () => {
            const nama = document.getElementById('nama').value;
            const alamat = document.getElementById ('alamat').value;
            const penerima = document.getElementById('penerima').value;

            if (!nama || !alamat || !penerima) {
                Swal.showValidationMessage('Silakan isi semua field');
            } else {
                // Kirim data ke server untuk diproses
                return { nama, alamat, penerima, paketId };
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Lakukan AJAX untuk mengirim data ke server
            fetch('order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(result.value)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Berhasil!', 'Pesanan Anda telah diproses.', 'success');
                } else {
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat memproses pesanan.', 'error');
                }
            });
        }
    });
}

function addToCart(paketId) {
    cartCount++;
    document.getElementById('cart-count').innerText = cartCount;

    Swal.fire({
        title: 'Berhasil!',
        text: 'Paket telah ditambahkan ke keranjang.',
        icon: 'success',
        confirmButtonText: 'OK'
    });
}