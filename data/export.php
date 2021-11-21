<?php
$hal = "dashboard";
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
$conn = mysqli_connect("localhost", "root", "", "remotlab");
$result = mysqli_query($conn, "SELECT * FROM hasilpraktikum");
?>
<main class="main" id="main">
  <div class="container">
    <h2>Hasil Praktikum</h2>
    <div class="data-tables datatable-dark">
      <table class="table align-items-center table-flush" id="mauexport">
        <thead class="thead-light">
          <tr>
            <th>Timestamp</th>
            <th>Vin</th>
            <th>Vout</th>
            <!-- <th>Praktikum</th> -->
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?= $row["waktu"]; ?></td>
              <td><?= $row["vin"]; ?></td>
              <td><?= $row["vout"]; ?></td>
              <!-- <td><span class="badge badge-success">Starting</span></td> -->
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>

    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#mauexport').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
</main>
<?php
include('../component/footer.inc.php');
?>