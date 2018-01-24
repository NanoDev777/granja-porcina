<template>
  <div class="container animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div class="table-responsive">
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Fecha</th>
                  <th>Sexo</th>
                  <th>Condición</th>
                  <th>Genética</th>
                  <th>Precio</th>
                </tr>
              </thead>
            </table>
          </div>
        </b-card>
      </div>
    </div>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import datatables from 'datatables.net'
  import datatablesB from 'datatables.net-bs4'
  import datatablesR from 'datatables.net-responsive'
  import datatablesRB from 'datatables.net-responsive-bs4'

  export default {
    name: 'list-reproductores',
    data:() => {
      return {
      }
    },
    created() {
      $(function() {
        var token = localStorage.getItem('token')
        $('#example').DataTable({
          responsive: true,
          processing: true,
          serverSide: true,
          ajax: {
            url: '/api/reproductores',
            type: 'GET',
            headers: { "Authorization": 'Bearer ' + token }
          },
          columns: [
            {data: "codigo"},
            {data: "fecha"},
            {data: "sexo"},
            {data: "condicion"},
            {data: "genetica"},
            {data: "precio"}
          ],
          columnDefs: [{
            targets: 0,
            render: function ( data, type, row, meta ) {
              return '<a href="'+data+'">'+data+'</a>';
            }
          }]
        });
      });
    },
    computed: {
      ...mapGetters([
        'currentUser',
        'reproductores'
      ])
    }
  }
</script>
