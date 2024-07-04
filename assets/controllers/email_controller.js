import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  static targets = ["label", "input", "description"];

  submit() {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const value = this.inputTarget.value;

    if (emailPattern.test(value)) {
      this.inputTarget.className = "bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
      this.labelTarget.className = "block mb-2 text-sm font-medium text-green-700 dark:text-green-500";
      this.descriptionTarget.className = "mt-2 text-sm text-green-600 dark:text-green-500";
      this.descriptionTarget.textContent = "Thanks your email as been sent!";

      return;
    }

    this.inputTarget.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500";
    this.labelTarget.className = "block mb-2 text-sm font-medium text-red-700 dark:text-red-500";
    this.descriptionTarget.className = "mt-2 text-sm text-red-600 dark:text-red-500";
    this.descriptionTarget.textContent = "Oups! This is not a valid email address. Please try again.";
  }
}
