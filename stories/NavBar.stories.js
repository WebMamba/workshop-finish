import NavBar from '../templates/components/NavBar.html.twig';
import {twig} from "@sensiolabs/storybook-symfony-webpack5";

export default {
  component: (args) => ({
    components: {NavBar},
    template: twig`
      <twig:NavBar />
    `
  }),
  args: {
    name: 'World'
  }
}

export const Default = {};
