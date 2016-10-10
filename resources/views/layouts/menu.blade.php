

<li class="{{ Request::is('components*') ? 'active' : '' }}">
    <a href="{!! route('components.index') !!}"><i class="fa fa-edit"></i><span>Komponen</span></a>
</li>
<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>customers</span></a>
</li>

<li class="{{ Request::is('vehicles*') ? 'active' : '' }}">
    <a href="{!! route('vehicles.index') !!}"><i class="fa fa-edit"></i><span>vehicles</span></a>
</li>

<li class="{{ Request::is('typeServices*') ? 'active' : '' }}">
    <a href="{!! route('typeServices.index') !!}"><i class="fa fa-edit"></i><span>type_services</span></a>
</li>

<li class="{{ Request::is('typeTransportations*') ? 'active' : '' }}">
    <a href="{!! route('typeTransportations.index') !!}"><i class="fa fa-edit"></i><span>type_transportations</span></a>
</li>

<li class="{{ Request::is('services*') ? 'active' : '' }}">
    <a href="{!! route('services.index') !!}"><i class="fa fa-edit"></i><span>services</span></a>
</li>

<li class="{{ Request::is('detailServices*') ? 'active' : '' }}">
    <a href="{!! route('detailServices.index') !!}"><i class="fa fa-edit"></i><span>detail_services</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>users</span></a>
</li>

