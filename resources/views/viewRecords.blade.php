@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('View Records') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <ul>
            <li v-for="item in items"
                key:="item.id">
                 
            </li>
          </ul>
          

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  export default {
      data() {
        return {
          items: []
        }
      },
      created(){
        axios.get('users/list')
                .then(response => {
                  console.log(response);
                })
                .catch(error => {
                  console.log(error)
                });
      }
  }
</script>
@endsection

