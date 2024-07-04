import Email from '../templates/components/Email.html.twig';
import { twig } from '@sensiolabs/storybook-symfony-webpack5';
import {userEvent, waitFor, within, expect, fn} from "@storybook/test";

export default {
  component: (args) => ({
    component: {Email},
    template: twig`
        <twig:Email/>
    `,
  })
}


export const Default = {}

export const WrongEmail = {
  play: async ({canvasElement}) => {
    const canvas = within(canvasElement);

    await userEvent.type(canvas.getByLabelText('Email'), 'wrongemail');
    await userEvent.type(canvas.getByLabelText('FirstName'), 'Kobe');
    await userEvent.type(canvas.getByLabelText('LastName'), 'Bryant');

    await userEvent.click(canvas.getByRole('button'));

    await waitFor(() => {
      expect(canvas.getByText('Oups! This is not a valid email address. Please try again.')).toBeInTheDocument();
    })
  }
}

export const ValidEmail = {
  play: async ({canvasElement}) => {
    const canvas = within(canvasElement);

    await userEvent.type(canvas.getByLabelText('Email'), 'kobe@bryan.com');
    await userEvent.type(canvas.getByLabelText('FirstName'), 'Kobe');
    await userEvent.type(canvas.getByLabelText('LastName'), 'Bryant');

    await userEvent.click(canvas.getByRole('button'));

    await waitFor(() => {
      expect(canvas.queryByText('Oups! This is not a valid email address. Please try again.')).not.toBeInTheDocument();
    })
  }
}
