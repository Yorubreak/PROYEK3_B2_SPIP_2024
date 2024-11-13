@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss'
])
@endsection

@extends('layouts/LayoutMaster')

<div class="container mt-5">
  <!-- Segment 1 -->
  <section id="segment1">
      <h2>Segment 1</h2>
      <p>Konten untuk Segment 1</p>
  </section>

  <!-- Segment 2 -->
  <section id="segment2" class="mt-5">
      <h2>Segment 2</h2>
      <p>Konten untuk Segment 2</p>
  </section>

  <!-- Segment 3: Penilaian Risiko & Pemantauan -->
  <section id="segment3" class="mt-5">
      <h2>Penilaian Risiko & Pemantauan</h2>
      <div class="row">
          <!-- Layout 3x3 untuk 9 Chart -->
          <div class="col-md-9">
              <div class="row">
                  <?php for ($i = 1; $i <= 9; $i++): ?>
                      <div class="col-md-4 mb-4">
                          <div class="card">
                              <div class="card-body">
                                  <canvas id="chart<?= $i ?>"></canvas>
                              </div>
                          </div>
                      </div>
                  <?php endfor; ?>
              </div>
          </div>

          <!-- Layout 1x1 untuk 1 Chart -->
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body">
                      <canvas id="chart10"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Inisialisasi Chart JS di sini untuk tiap chart
  <?php for ($i = 1; $i <= 10; $i++): ?>
  const ctx<?= $i ?> = document.getElementById('chart<?= $i ?>').getContext('2d');
  const chart<?= $i ?> = new Chart(ctx<?= $i ?>, {
      type: 'bar', // Ganti tipe chart sesuai kebutuhan
      data: {
          labels: ['Label1', 'Label2', 'Label3'],
          datasets: [{
              label: 'Data <?= $i ?>',
              data: [10, 20, 30],
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  <?php endfor; ?>
</script>

</body>
</html>
