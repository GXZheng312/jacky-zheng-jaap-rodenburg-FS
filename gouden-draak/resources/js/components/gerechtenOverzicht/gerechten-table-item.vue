<template>
    <tr>
        <td>{{gerecht.id}}</td>
        <td>{{gerecht.menunummer}}</td>
        <td>{{gerecht.menu_toevoeging}}</td>
        <td>{{gerecht.naam}}</td>
        <td>{{gerecht.prijs}}</td>
        <td>{{gerecht.soort_gerecht.oort}}</td>
        <td>{{gerecht.pittigheid.pittigheid}}</td>
        <td>{{gerecht.beschrijving}}</td>
        <td>
            <div class="btn-group-vertical">
                <a :href="editAction" class="btn btn-warning">Aanpassen</a>

                <form method="POST" :action="deleteAction" accept-charset="UTF-8"><input
                    name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden"
                                                                       :value="csrf">
                    <button type="submit" title="Delete Post"
                            onclick="return confirm('Wilt u het zeker verwijderen?')" class="btn btn-danger">
                        Verwijderen
                    </button>
                </form>
            </div>
        </td>
    </tr>

</template>

<script>
export default {
    props: ['gerecht'],
    async mounted() {
    },
    data() {
        return {
            deleteAction :`/kassa/gerecht/${this.gerecht.id}`,
            editAction: `/kassa/gerecht/${this.gerecht.id}/edit`,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
}
</script>

