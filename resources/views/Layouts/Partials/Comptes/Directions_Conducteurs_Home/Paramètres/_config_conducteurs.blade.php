<div style="width:100%; margin-left:0;">
<!--
			<div class="alert alert-success alert-dismissible"></div>
-->

		<div class="div-centre">

				<h3  class="div-centre-tire">Liste des conducteurs travaux</h3>

			<div class="contour-tableau">
        <table class="div-centre-tableau">
				      <thead class="div-centre-tableau-head">
					           <tr class="div-centre-tableau-tr">
						             <th class="div-centre-tableau-tr-th-nom">Nom</th>
												 <th class="div-centre-tableau-tr-th-nom">Prénom</th>
						             <th class="div-centre-tableau-tr-th">Fonction</th>
						             <th class="div-centre-tableau-tr-th">Email</th>
												 <th colspan="3" class="div-centre-tableau-tr-th-otpion">Options</th>
						             <th></th>
						             <th></th>
					           </tr>
				     </thead>

             <tbody>
                    @foreach($userscond as $user)
						        <tr class="div-centre-tableau-tr2">
          							<td class="div-centre-foreach-nom"><strong>{{$user->nom}}</strong></td>
												<td class="div-centre-foreach-nom">{{$user->prénom}}</td>
          							<td class="div-centre-foreach-fonctions">{{$user->fonction}}</td>
          					    <td class="div-centre-foreach-email">{{$user->email}}</td>

												<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
												<td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>

          							<td class="div-centre-foreach-bouton">{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
          									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
          								  {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
	  		    </tbody>
			  </table>
			</div>
		</div>
</div>
