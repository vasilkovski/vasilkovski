<template>
<base-dialog v-if="isInputInvalid" title="Invalid Input" @close="confirmError">
    <template #default>
        <p> Unfortunately, at least one input value is invalid.</p>
        <p>Please check all inputs and make sure you enter at least a few characters into each input filed.</p>
    </template>
    <template #actions>
        <base-button @click="confirmError">Okay</base-button>
    </template>
</base-dialog>
  <base-card>
    <form @submit.prevent="submitData">
      <div class="form-control">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" ref="titleInput" />
      </div>
      <div class="form-control">
        <label for="description">Description</label>
        <textarea
          id="description"
          name="description"
          rows="3"
          ref="descInput"
        ></textarea>
      </div>
      <div class="form-control">
        <label for="link">Link</label>
        <input type="url" name="link" id="link" ref="linkInput" />
      </div>
      <div>
        <base-button type="submit">Add resource</base-button>
      </div>
    </form>
  </base-card>
</template>

<script>
import BaseButton from '../UI/BaseButton.vue';
export default {
  components: { BaseButton },
  inject: ['addResource'],
  data() {
    return {
      isInputInvalid: false
    };
  },
  methods: {
    submitData() {
      const eneteredTitle = this.$refs.titleInput.value;
      const eneteredDesc = this.$refs.descInput.value;
      const eneteredLink = this.$refs.linkInput.value;

      if (
        eneteredTitle.trim() == '' ||
        eneteredDesc.trim() == '' ||
        eneteredLink.trim() == ''
      ) {
          this.isInputInvalid = true
        return;
      }

      this.addResource(eneteredTitle, eneteredDesc, eneteredLink);
    },

    confirmError(){
        this.isInputInvalid = false
    }

  }
};
</script>

<style scoped>
label {
  font-weight: bold;
  display: block;
  margin-bottom: 0.5rem;
}

input,
textarea {
  display: block;
  width: 100%;
  font: inherit;
  padding: 0.15rem;
  border: 1px solid #ccc;
}

input:focus,
textarea:focus {
  outline: none;
  border-color: #3a0061;
  background-color: #f7ebff;
}

.form-control {
  margin: 1rem 0;
}
</style>
