<?php $nb=count($data_historique); ?>

<div class="center">

    <div class="titre">
      <h2 class="text-titre-tab">Historique des Observations</h2>
    </div>

        <div class="tableau">
            <table class="Observations">

              <tbody class="tbody">
                  <th class="tab_titre">Date</th>
                  <th class="tab_titre"></th>
              <tbody>

                @for($i=0; $i<$nb; $i++)
                    <tr class="choice">
                        <th><button class="button-l" type='submit' formaction ='{{route('showData_observations')}}' name='Date' {!!"value='$data_historique[$i]'"!!} ><?php echo date("d/m/Y", strtotime($data_historique[$i])) ?></button></th>
                        <th><button class="button-r" formaction="" >Telecharger</button></th>
                    </tr>
                @endfor

            </table>

        </div>

</div>
