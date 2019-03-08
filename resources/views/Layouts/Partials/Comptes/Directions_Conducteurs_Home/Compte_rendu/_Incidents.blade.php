{!!"<div class='contenant-principal'>"!!}

    {!!"<div class='contenant'>"!!}

        {!!"<div class='titre-accident'>"!!}
          {!!"<h2 class='titre-text-accident'>Accidents</h2>"!!}
        {!!"</div>"!!}

        {!!"<div class='contenant-accident'>"!!}
          {{$tab_incident_data[$i][0][0]}}
        {!!"</div>"!!}

    {!!"</div>"!!}

    {!!"<div class='contenant'>"!!}

        {!!"<div class='titre-panne'>"!!}
          {!!"<h2 class='titre-text-panne'>Pannes</h2>"!!}
        {!!"</div>"!!}

        {!!"<div class='contenant-panne'>"!!}
          {{$tab_incident_data[$i][0][1]}}
        {!!"</div>"!!}

    {!!"</div>"!!}

    {!!"<div class='contenant'>"!!}

        {!!"<div class='titre-autre'>"!!}
          {!!"<h2 class='titre-text-autre'>Autres</h2>"!!}
        {!!"</div>"!!}

        {!!"<div class='contenant-autre'>"!!}
          {{$tab_incident_data[$i][0][2]}}
        {!!"</div>"!!}

    {!!"</div>"!!}

{!!"</div>"!!}
