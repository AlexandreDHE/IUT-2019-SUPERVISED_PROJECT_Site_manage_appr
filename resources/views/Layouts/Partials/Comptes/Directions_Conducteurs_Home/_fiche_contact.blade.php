<div style="width:100%;margin-top: 2%;">

	<div class="div-centre">

			<h3  class="div-centre-tire-contact">Liste des contacts</h3>
			<div class="contour-tableau">
					<table class="div-centre-tableau">
								<thead class="div-centre-tableau-head">
											 <tr class="div-centre-tableau-tr">
													 <th class="div-centre-tableau-tr-th-nom">Nom</th>
													 <th class="div-centre-tableau-tr-th-nom">Prénom</th>
													 <th class="div-centre-tableau-tr-th">Fonction</th>
													 <th class="div-centre-tableau-tr-th">Email</th>
													 <th class="div-centre-tableau-tr-th">Téléphone</th>
											 </tr>
							 </thead>

							 <tbody>

								 @foreach($users as $user)
								 <tr class="div-centre-tableau-tr2">
										 <td class="div-centre-foreach-nom"><strong>{{$user->nom}}</strong></td>
										 <td class="div-centre-foreach-nom">{{$user->prénom}}</td>
                     <td class="div-centre-foreach-email">{{$user->fonction}}</td>
                     <td class="div-centre-foreach-email"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
										 <td class="div-centre-foreach-fonctions"><a href='{!!"$user->num_tel"!!}'>{{$user->num_tel}}</a></td>
 									</tr>
									@endforeach

							</tbody>

					</table>
		</div>

	</div>
