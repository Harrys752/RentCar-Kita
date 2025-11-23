import './bootstrap';

function showToast(message) {
  const toastEl = document.getElementById('liveToast');
  const toastBody = document.getElementById('liveToastBody');
  toastBody.innerText = message;
  const toast = new bootstrap.Toast(toastEl);
  toast.show();
}

// konfirmasi hapus (bubuhkan data-name pada tombol hapus)
document.addEventListener('click', function(e) {
  if (e.target && (e.target.matches('.btn-delete') || e.target.closest('.btn-delete'))) {
    const btn = e.target.closest('.btn-delete');
    const name = btn.dataset.name || 'item ini';
    if (!confirm(`Yakin ingin menghapus ${name}? Tindakan ini tidak bisa dibatalkan.`)) {
      e.preventDefault();
    }
  }

  document.getElementById('search').addEventListener('input', function () {
    fetch('/search-cars?q=' + this.value)
        .then(res => res.json())
        .then(data => {
            let html = '';
            data.forEach(car => {
                html += `
                    <tr>
                        <td>${car.brand}</td>
                        <td>${car.number}</td>
                    </tr>
                `;
            });
            document.getElementById('result').innerHTML = html;
        });
});

});
document.getElementById('search').addEventListener('input', function () {
    fetch('/search-cars?q=' + this.value)
        .then(res => res.json())
        .then(data => {
            let html = '';
            data.forEach(car => {
                html += `
                    <tr>
                        <td>${car.brand}</td>
                        <td>${car.number}</td>
                    </tr>
                `;
            });
            document.getElementById('result').innerHTML = html;
        });
});

