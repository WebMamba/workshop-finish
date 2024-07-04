import {twig} from "@sensiolabs/storybook-symfony-webpack5";

export default {
    component: twig`
        <div>Hello {{ args.name }}!</div>
    `,
    args: {
        name: 'World'
    }
}

export const Default = {};

export const John = {
    args: {
        name: 'John'
    }
};

export const Jane = {
    args: {
        name: 'Jane'
    }
};
