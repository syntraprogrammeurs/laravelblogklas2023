<template>
    <form @submit.prevent="submitForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" v-model="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" v-model="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Brand</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            description: '',
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await axios.post('/brands', {
                    name: this.name,
                    description: this.description,
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                });
                this.$emit('brandCreated', response.data);
                this.name = '';
                this.description = '';
            } catch (error) {
                console.error(error);
            }
        },

    },
};
</script>
