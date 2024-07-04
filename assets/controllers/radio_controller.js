import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {source: String, stream: String};

    static targets = ['audio', 'play', 'pause'];

    initialize() {
        this.play = false;
    }

    toggle(event) {
        event.stopImmediatePropagation();

        if (!this.play) {
            this.dispatch('playRadio', {
                detail: {
                    source: this.sourceValue,
                    stream: this.streamValue
                }
            });

            this.playTarget.classList.toggle('hidden');
            this.pauseTarget.classList.toggle('hidden');
            this.play = true;

            return;
        }

        if (this.play) {
            this.dispatch('pauseRadio');

            this.playTarget.classList.toggle('hidden');
            this.pauseTarget.classList.toggle('hidden');
            this.play = false;
        }
    }
}
