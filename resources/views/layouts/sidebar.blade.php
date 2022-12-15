<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
  
  <li class="nav-item" {{ Route::currentRouteName() == 'incomes.incomes' ? 'active' : '' }}>
    <a href="{{ route('incomes.incomes') }}" class="nav-link">
      <i class="nav-icon fas fa-money-bill-alt"></i>
      <p>
        Pajamos
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-edit"></i>
      <p>
        Kategorijos
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item" {{ Route::currentRouteName() == 'categories.categories' ? 'active' : '' }}>
        <a href="{{ route('categories.categories') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Kategorija</p>
        </a>
      </li>
      <li class="nav-item" {{ Route::currentRouteName() == 'subcategories.subcategories' ? 'active' : '' }}>
        <a href="{{ route('subcategories.subcategories') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Subkategorija</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item" {{ Route::currentRouteName() == 'expenses.expenses' ? 'active' : '' }}>
    <a href="{{ route('expenses.expenses') }}" class="nav-link">
      <i class="nav-icon fas fa-money-check-alt"></i>
      <p>
        Išlaidos
      </p>
    </a>
  </li>
  <li class="nav-item" {{ Route::currentRouteName() == 'bills.bills' ? 'active' : '' }}>
    <a href="{{ route('bills.bills') }}" class="nav-link">
      <i class="nav-icon fas fa-money-bill-wave"></i>
      <p>
        Mokesčiai
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-chart-bar"></i>
      <p>
        Apžvalga
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item" {{ Route::currentRouteName() == 'report.report' ? 'active' : '' }}>
        <a href="{{ route('report.report') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Ataskaita</p>
        </a>
      </li>
      <li class="nav-item" {{ Route::currentRouteName() == 'diagram.diagram' ? 'active' : '' }}>
        <a href="{{ route('diagram.diagram') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Diagramos</p>
        </a>
      </li> 
      <li class="nav-item" {{ Route::currentRouteName() == 'summary.summary' ? 'active' : '' }}>
        <a href="{{ route('summary.summary') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Santrauka</p>
        </a>
      </li>
      {{-- <li class="nav-item" {{ Route::currentRouteName() == 'calendar.expenseCalendar' ? 'active' : '' }}>
        <a href="{{ route('calendar.incomesCalendar') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Pajamų kalendorius</p>
        </a>
      </li> --}}
    </ul>
  </li>
</ul>