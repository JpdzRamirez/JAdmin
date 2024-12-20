<div>
       {{-- Navigation zone⛵ --}}
       <div class="page-header">
            <h3 class="fw-bold mb-3">{{ __('navigation.nav-users-crud') }}</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('home') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.crud')}}"><i class="fa-light fa-users"></i> {{ __('navigation.users-crud.navigation') }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-form">
                    {{-- Title zone --}}
                    <div class="card-header">
                        <div class="card-title">{{ __('navigation.users-crud.title') }}</div>
                        <h2 style="text-align: center">{{__('navigation.users-crud.sub-title')}}</h2>
                        <div class="card-category">
                            <span>{{ __('navigation.users-crud.span') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Name --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-head-bg-info">
                              <thead>
                                <tr>
                                  <th>#Id</th>
                                  <th><i class="fa-light fa-user"></i> {{__('tables.users-crud.col-1')}}</th>
                                  <th><i class="fa-solid fa-users-rectangle"></i> {{__('tables.users-crud.col-2')}}</th>
                                  <th><i class="fa-solid fa-siren-on"></i> {{__('tables.users-crud.col-3')}}</th>
                                  <th><i class="fa-solid fa-address-card"></i> {{__('tables.users-crud.col-4')}}</th>
                                  <th><i class="fa-light fa-calendar-days"></i> {{__('tables.users-crud.col-5')}}</th>
                                  <th><i class="fa-solid fa-users-rays"></i> {{__('tables.users-crud.col-6')}}</th>
                                </tr>
                              </thead>
                              <tbody class="tbody-column">
                                @foreach ($users as $key=>$user )
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$user->name." ".$user->lastname}}</td>
                                        <td>{{$user->roles->name}}</td>
                                        <td>
                                            @if ($user->active==1)
                                                <span class="badge badge-success"><i class="fa-solid fa-octagon-check"></i>{{__('tables.users-crud.active')}}</span>                                                
                                            @else
                                                <span class="badge badge-danger"><i class="fa-solid fa-hexagon-xmark"></i>{{__('tables.users-crud.inactive')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->pos_register==1)
                                                <span class="badge badge-success"><i class="fa-solid fa-clipboard-list-check"></i> {{__('tables.users-crud.active')}}</span>                                                
                                            @else
                                                <span class="badge badge-danger"><i class="fa-solid fa-hexagon-xmark"></i> {{__('tables.users-crud.inactive')}}</span>
                                            @endif
                                        </td>
                                        <td>{{$user->created_at->toFormattedDateString()}}</td>
                                        <td>
                                            <div class="crud-buttons" style="width:fit-content;">
                                                <a target="_blank" href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm mb-1"><i class="fa-regular fa-user-pen"></i> {{__('tables.users-crud.edit')}}</a>
                                                <a wire:click="deleteUser({{ $key }})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can-xmark"></i> {{__('tables.users-crud.delete')}}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                </div>
            </div>
        </div>
</div>
