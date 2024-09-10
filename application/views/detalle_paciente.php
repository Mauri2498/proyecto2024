
<table class="table">
    <tr>
        <th>Nombre Completo</th>
        <td><?= $detalles->nombre ?> <?= $detalles->apellidos ?></td>
    </tr>
    <tr>
        <th>Servicio</th>
        <td><?= $detalles->nombreServicio ?></td>
    </tr>
    <tr>
        <th>Total a Pagar</th>
        <td><?= number_format($detalles->total, 2) ?> Bs.</td>
    </tr>
    <tr>
        <th>Total Pagado</th>
        <td><?= number_format($detalles->pagado, 2) ?> Bs.</td>
    </tr>
    <tr>
        <th>Deuda Restante</th>
        <td><?= number_format($detalles->total - $detalles->pagado, 2) ?> Bs.</td>
    </tr>
</table>