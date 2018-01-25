<template>
  <div class="container animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div class="table-responsive">
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="50px">Código</th>
                  <th width="80px">Opciones</th>
                  <th>Condición</th>
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
    created () {
      $(function() {
        var token = localStorage.getItem('token')
        $.fn.dataTable.ext.errMode = 'none'
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
            {
              data: null,
              defaultContent: '<button type="button" class="btn btn-default btn-sm"><i v-else class="fa fa-medkit"></i></button> <button type="button" class="btn btn-default btn-sm"><i v-else class="fa fa-pencil"></i></button>'
            },
            {data: "condicion"},
            {data: "precio"}
          ]
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
