@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>All Messages</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('admin.index')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">All Messages</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <!-- <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form> -->
                                        </div>
                                        <!-- <a class="tf-button style-1 w208" href="{{route('admin.coupon.add')}}"><i  class="icon-plus"></i>Add new</a> -->
                                    </div>
                                    <!-- message table -->
                                    <div class="wg-table table-all-user">
  <div class="table-responsive">
    @if(Session::has('status'))
      <p class="alert alert-success"> {{ Session::get('status') }}</p>
    @endif

    <table class="table table-bordered table-striped align-middle text-center w-100">
      <thead class="table-light">
        <tr>
          <th class="text-center" style="width: 90px">#</th>
          <th class="text-center" style="width: 190px">Name</th>
          <th class="text-center">Phone</th>
          <th class="text-center">Email</th>
          <th class="text-center">Message</th>
          <th class="text-center">Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
          <tr>
            <td class="text-center">{{ $contact->id }}</td>
            <td class="text-center">{{ $contact->name }}</td>
            <td class="text-center">{{ $contact->phone }}</td>
            <td class="text-center">{{ $contact->email }}</td>
            <td class="text-center">{{ $contact->comment }}</td>
            <td class="text-center">{{ $contact->created_at }}</td>
            <td>
              <div class="list-icon-function">
                <form action="{{ route('admin.contact.delete', ['id' => $contact->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn p-0 border-0 bg-transparent text-danger" onclick="return confirm('Are you sure you want to delete this message?')">
                    <i class="icon-trash-2"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach              
      </tbody>
    </table>
  </div>
</div>

                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                        {{$contacts->links('pagination::bootstrap-5')}}
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection

@push('scripts')
    <script>
        $(function(){
            $(".delete").on('click',function(e){
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Are you sure?",
                    text: "You want to delete this record?",
                    type: "warning",
                    buttons: ["No", "Yes"],
                    confirmButtonColor: '#dc3545'
                }).then(function (result) {
                    if (result) {
                        form.submit();  
                    }
                });                             
            });
        });
    </script>    
@endpush
