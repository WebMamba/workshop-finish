import PlayerButton from '../templates/components/PlayerButton.html.twig';
import {twig} from "@sensiolabs/storybook-symfony-webpack5";

export default {
  component: (args) => ({
    components: {PlayerButton},
    template: twig`
      <twig:PlayerButton />
    `
  }),
}

export const Default = {};

