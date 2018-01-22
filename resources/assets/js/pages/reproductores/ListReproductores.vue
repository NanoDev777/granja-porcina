<template>
  <div class="container animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div class="table-responsive">
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
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
        fields: ['codigo', 'fecha', 'sexo', 'condicion', 'genetica', 'precio']
      }
    },
    created() {
      this.$store.dispatch("getReproductores")
    },
    mounted: function() {
      $(function() {
        $('#example').DataTable({
          responsive: true,
          processing: true,
          serverSide: true,
          ajax: "/api/users",
          columns: [
            {data: "id"},
            {data: "name"},
            {data: "email"}
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
